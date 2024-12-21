pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/sonayadevianja/warehouse.git'
            }
        }
        stage('Build') {
            steps {
                echo 'Building the application...'
                // Perintah build
            }
        }
        stage('Test') {
            steps {
                echo 'Running tests...'
                // Perintah test
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying the application...'
                // Perintah deploy
            }
        }
    }
}
