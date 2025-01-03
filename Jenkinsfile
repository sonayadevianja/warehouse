pipeline {
    agent any

    environment {
     DOCKER_SERVER = 'localhost'
    }

    stages {
        stage('Clone Repository') {
            steps {

                echo 'Cloning Repository...'
                checkout([$class: 'GitSCM', branches: [[name: '*/main']], userRemoteConfigs: [[url: 'https://github.com/sonayadevianja/warehouse.git', credentialsId: 'github-pat']]])


            }
        }

        stage('Install dependencies') {
                    steps {

                        echo 'Run npm install'
                        bat 'npm install'

                        echo 'Run composer install'
                        bat 'composer install'

                        echo 'Cloning file .env.example ke .env'
                        bat 'copy .env.example .env'


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
