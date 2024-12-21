pipeline {
    agent any

    environment {
        DOCKER_IMAGE_NAME = 'laravel-app'
        DOCKER_REGISTRY = 'docker.io/sonayadevi' // Sesuaikan dengan registry DockerHub Anda
        KUBERNETES_SERVER = 'k8s.example.com' // Sesuaikan dengan server Kubernetes Anda
        ANSIBLE_SERVER = 'ansible-server.example.com' // Sesuaikan dengan server Ansible Anda
        COMPOSE_FILE = 'docker-compose.yml' // Nama file docker-compose Anda
    }

    stages {
        stage('Declarative: Checkout SCM') {
            steps {
                echo 'Checking out the repository using SCM...'
                checkout scm
            }
        }

        stage('Git Checkout') {
            steps {
                echo 'Performing Git checkout...'
                git 'https://github.com/username/repository.git' // Sesuaikan dengan repositori Anda
            }
        }

        stage('Sending Dockerfile to Ansible Server') {
            steps {
                echo 'Sending Dockerfile to Ansible server...'
                sh 'scp Dockerfile user@${ANSIBLE_SERVER}:/path/to/dockerfile/destination'
            }
        }

        stage('Docker Build Image') {
            steps {
                echo 'Building Docker image...'
                sh 'docker build -t ${DOCKER_IMAGE_NAME} .'
            }
        }

        stage('Push Docker Image to DockerHub') {
            steps {
                echo 'Pushing Docker image to DockerHub...'
                sh '''
                docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD ${DOCKER_REGISTRY}
                docker tag ${DOCKER_IMAGE_NAME} ${DOCKER_REGISTRY}/${DOCKER_IMAGE_NAME}:latest
                docker push ${DOCKER_REGISTRY}/${DOCKER_IMAGE_NAME}:latest
                '''
            }
        }

        stage('Copy File from Jenkins to Kubernetes Server') {
            steps {
                echo 'Copying deployment files to Kubernetes server...'
                sh 'scp deployment.yaml user@${KUBERNETES_SERVER}:/path/to/deployment'
            }
        }

        stage('Kubernetes Deployment using Ansible') {
            steps {
                echo 'Deploying application to Kubernetes using Ansible...'
                sh '''
                ansible-playbook -i ${KUBERNETES_SERVER}, deploy.yaml
                '''
            }
        }
    }

    post {
        always {
            echo 'Declarative Post Action: Cleaning up workspace...'
            cleanWs() // Membersihkan workspace setelah pipeline selesai
        }
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed. Check logs for details.'
        }
    }
}
