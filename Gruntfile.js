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
      'nightly_clean', [
      'sshexec:save_forum_nightly',
      'sshexec:clean_nightly']);
  grunt.registerTask('nightly_deploy', ['sshexec:deploy_nightly',
      'sshexec:restore_forum_nightly']);
  grunt.registerTask('nightly', ['nightly_clean', 'nightly_deploy']);
};
