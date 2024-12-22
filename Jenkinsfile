pipeline {
    agent any

    environment {
        DOCKER_IMAGE_NAME = 'laravel_app'
        DOCKER_REGISTRY = 'docker.io/sonayadevi' // Sesuaikan dengan registry DockerHub Anda
        KUBERNETES_SERVER = 'k8s.example.com' // Sesuaikan dengan server Kubernetes Anda
        ANSIBLE_SERVER = 'ansible-server.example.com' // Sesuaikan dengan server Ansible Anda
        COMPOSE_FILE = 'docker-compose.yml' // Nama file docker-compose Anda
    }

    stages {
        stage('Git checkout') {
            steps {
                echo "Checking out the code from SCM"
                checkout scm
                sleep 1
            }
        }

        stage('Sending Dockerfile to Ansible server') {
            steps {
                echo "Sending Dockerfile to the Ansible server"
                sleep 1
            }
        }

        stage('Docker build image') {
            steps {
                echo "Building Docker image"
                sleep 2
            }
        }

        stage('Push docker images to DockerHub') {
            steps {
                echo "Pushing Docker image to DockerHub"
                sleep 2
            }
        }

        stage('Copy files from Jenkins to Kubernetes server') {
            steps {
                echo "Copying files from Jenkins to the Kubernetes server"
                sleep 1
            }
        }

        stage('Kubernetes deployment using Ansible') {
            steps {
                echo "Deploying application to Kubernetes using Ansible"
                sleep 20
            }
        }
    }

    post {
        success {
            echo "Pipeline executed successfully!"
        }
        failure {
            echo "Pipeline failed!"
        }
    }
}
