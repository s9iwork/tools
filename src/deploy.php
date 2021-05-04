<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:shinjiezumi/tools.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts
inventory('hosts.yml');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// サブディレクトリでコマンドを実行するようにする
task('change_cwd', function () {
	$subdir = get('release_path') . DIRECTORY_SEPARATOR . 'src';
	set('release_path', $subdir);
	run('cd {{release_path}}');
});

after('deploy:update_code', 'change_cwd');


// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

