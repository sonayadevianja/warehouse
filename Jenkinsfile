pipeline {
    agent any

    environment {
        DOCKER_IMAGE_NAME = 'laravel_app'
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
                script {
                    try {
                        git 'https://github.com/sonayadevianja/warehouse.git' // Sesuaikan dengan repositori Anda
                        echo 'Git checkout successful!'
                    } catch (Exception e) {
                        error "Git checkout failed: ${e.message}"
                    }
                }
            }
        }

        stage('Sending Dockerfile to Ansible Server') {
            steps {
                echo 'Sending Dockerfile to Ansible server...'
                script {
                    try {
                        sh 'scp Dockerfile user@${ANSIBLE_SERVER}:/path/to/dockerfile/destination'
                        echo 'Dockerfile sent to Ansible server successfully!'
                    } catch (Exception e) {
                        error "Failed to send Dockerfile to Ansible server: ${e.message}"
                    }
                }
            }
        }

        stage('Docker Build Image') {
            steps {
                echo 'Building Docker image...'
                script {
                    try {
                        sh 'docker build -t ${DOCKER_IMAGE_NAME} .'
                        echo 'Docker image built successfully!'
                    } catch (Exception e) {
                        error "Failed to build Docker image: ${e.message}"
                    }
                }
            }
        }

        stage('Push Docker Image to DockerHub') {
            steps {
                echo 'Pushing Docker image to DockerHub...'
                script {
                    try {
                        sh '''
                        docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD ${DOCKER_REGISTRY}
                        docker tag ${DOCKER_IMAGE_NAME} ${DOCKER_REGISTRY}/${DOCKER_IMAGE_NAME}:latest
                        docker push ${DOCKER_REGISTRY}/${DOCKER_IMAGE_NAME}:latest
                        '''
                        echo 'Docker image pushed to DockerHub successfully!'
                    } catch (Exception e) {
                        error "Failed to push Docker image to DockerHub: ${e.message}"
                    }
                }
            }
        }

        stage('Copy File from Jenkins to Kubernetes Server') {
            steps {
                echo 'Copying deployment files to Kubernetes server...'
                script {
                    try {
                        sh 'scp deployment.yaml user@${KUBERNETES_SERVER}:/path/to/deployment'
                        echo 'Deployment files copied successfully!'
                    } catch (Exception e) {
                        error "Failed to copy files to Kubernetes server: ${e.message}"
                    }
                }
            }
        }

        stage('Kubernetes Deployment using Ansible') {
            steps {
                echo 'Deploying application to Kubernetes using Ansible...'
                script {
                    try {
                        sh 'ansible-playbook -i ${KUBERNETES_SERVER}, deploy.yaml'
                        echo 'Kubernetes deployment completed successfully!'
                    } catch (Exception e) {
                        error "Failed to deploy application to Kubernetes using Ansible: ${e.message}"
                    }
                }
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
