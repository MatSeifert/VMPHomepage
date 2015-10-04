module.exports = function(grunt) {
  grunt.initConfig({
    clean: {
      build: ["vendor"]
    },
    sshconfig: {
      "vmp-clan": grunt.file.readJSON('secret.json')
    },
    sshexec: {
      uptime: {
        command: 'uptime',
        options: {
          config: 'vmp-clan'
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-ssh');

  grunt.registerTask(
      'uptime', [
      'sshexec:uptime']);
};
