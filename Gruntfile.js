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
			command: 'mv /var/www/wbb /tmp/wbb',
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
};
