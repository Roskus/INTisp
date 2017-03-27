// see https://dzone.com/refcardz/continuous-delivery-with-jenkins-workflow for tutorial
// see https://documentation.cloudbees.com/docs/cookbook/_pipeline_dsl_keywords.html for dsl reference
// This Jenkinsfile should simulate a minimal Jenkins pipeline and can serve as a starting point.
// NOTE: sleep commands are solelely inserted for the purpose of simulating long running tasks when you run the pipeline
node {
   stage 'build'
   sh 'echo "Compiling Packages..."';
   sh 'dpkg-deb --build application';
   sh "wget https://github.com/alwaysontop617/webister/archive/master.zip";
   
   stage 'check'
   sh 'php-cs-fixer fix application/tmp/webister/interface/ > log.txt'
   
   stage 'archive'
   archive 'master.zip'
   archive 'application.deb'
   archive 'log.txt'
}


