pipeline {
  agent any
  stages {
    stage('scan') {
      steps {
        sh "sudo docker run -v ${WORKSPACE}:/home/ubuntu/ravi --workdir /home/ubuntu/ravi returntocorp/semgrep-agent:v1 semgrep-agent --config p/ci "
      }
    }
  }
}
