pipeline {
    agent any

    environment {
        DOCKER_IMAGE_NAME = 'laravel_app'
        DOCKER_REGISTRY = 'sonayadevi' // Sesuaikan dengan nama pengguna DockerHub Anda
        COMPOSE_FILE = 'docker-compose.yml' // Nama file docker-compose Anda
    }

    stages {
        stage('Git Checkout') {
            steps {

                echo 'Cloning Repository...'
                checkout([$class: 'GitSCM', branches: [[name: '*/main']], userRemoteConfigs: [[url: 'https://github.com/sonayadevianja/warehouse.git', credentialsId: 'github-pat']]])


            }
        }

        stage('Docker Build Image') {
            steps {
                echo "Building Docker image"
                script {
                    sh "docker build -t ${DOCKER_REGISTRY}/${DOCKER_IMAGE_NAME}:latest ."
                }
            }
        }



        stage('Deploy Application') {
            steps {
                echo "Deploying application using Docker Compose"
                script {
                    sh "docker-compose down"
                    sh "docker-compose up -d"
                }
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
