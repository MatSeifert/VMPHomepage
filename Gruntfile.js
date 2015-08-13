module.exports = function(grunt) {
	grunt.initConfig({
		clean: {
			build: ["vendor"]
		},
		sshconfig: {
			"vmp-clan": grunt.file.readJSON('secret.json')
		},
		/*sftp: {
		  nightly: {

		  }
		  }*/
		sshexec: {
			uptime: {
				command: 'uptime',
				options: {
					config: 'vmp-clan'
				}
			},
			clean_nightly: {
				command: 'rm -rf /var/www/nightly',
				options: {
					config: 'vmp-clan'
				}
			},
			save_forum_nightly: {
				command: [
					'if [ -d /var/www/nightly/wbb ]; then cp -rf /var/www/nightly/wbb /tmp/wbb.nightly; fi',
					'if [ -d /var/www/nightly/wcf ]; then cp -r /var/www/nightly/wcf /tmp/wcf.nightly; fi'
				].join(' && '),
				options: {
					config: 'vmp-clan'
				}
			},
			deploy_nightly: {
				command: [
					'cd /var/www',
					'git clone git://github.com/MatSeifert/VMPHomepage.git nightly',
					'cd /var/www/nightly',
					'rm -rf .git',
					'composer install'
				].join(' && '),
				options: {
					config: 'vmp-clan'
				}
			},
			restore_forum_nightly: {
				command: [
					'cp -r /tmp/wbb.nightly /var/www/nightly/wbb',
					'cp -r /tmp/wcf.nightly /var/www/nightly/wcf'
				].join(' && '),
				options: {
					config: 'vmp-clan'
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-ssh');

	grunt.registerTask('nightly_clean', ['sshexec:save_forum_nightly',
										 'sshexec:clean_nightly']);
	grunt.registerTask('nightly_deploy', ['sshexec:deploy_nightly',
										 'sshexec:restore_forum_nightly']);
	grunt.registerTask('nightly', ['nightly_clean', 'nightly_deploy']);
};
