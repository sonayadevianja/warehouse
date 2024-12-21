pipeline {
    agent any
    
    environment {
        DOCKER_IMAGE_NAME = 'laravel-app'
        DOCKER_REGISTRY = 'docker.io/sonayadevi'  // Sesuaikan dengan registry DockerHub Anda
        KUBERNETES_SERVER = 'k8s.example.com'  // Sesuaikan dengan server Kubernetes Anda
        ANSIBLE_SERVER = 'ansible-server.example.com'  // Sesuaikan dengan server Ansible Anda
        COMPOSE_FILE = 'docker-compose.yml'  // Nama file docker-compose Anda
    }

    stages {
        // Checkout kode dari repositori Git
        stage('Checkout SCM') {
            steps {
                echo 'Checking out the repository...'
                checkout scm  // Checkout kode menggunakan SCM yang dikonfigurasi pada job Jenkins
            }
        }

        // Menarik kode dari repositori Git
        stage('Git Checkout') {
            steps {
                echo 'Performing Git checkout...'
                // Menarik kode dari GitHub atau repositori Git lainnya jika diperlukan
                git 'https://github.com/username/repository.git'  // Sesuaikan dengan repositori Anda
            }
        }

        // Kirim Dockerfile ke server Ansible
        stage('Send Dockerfile to Ansible Server') {
            steps {
                echo 'Sending Dockerfile to Ansible server...'
                // Mengirim Dockerfile ke server Ansible untuk deploy
                // Anda bisa menggunakan Ansible atau SCP untuk ini
                sh 'scp Dockerfile user@${ANSIBLE_SERVER}:/path/to/dockerfile/destination'
            }
        }

        // Membangun Docker image menggunakan Docker Compose
        stage('Docker Compose Build') {
            steps {
                echo 'Building Docker images using Docker Compose...'
                // Menjalankan build menggunakan Docker Compose
                sh 'docker-compose -f ${COMPOSE_FILE} build'
            }
        }

        // Menjalankan Docker Compose untuk memulai container
        stage('Docker Compose Up') {
            steps {
                echo 'Running Docker containers using Docker Compose...'
                // Menjalankan Docker Compose untuk memulai container
                
