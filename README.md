To start running the project:

1. <b>make build</b> to build the docker containers.
2. <b>make up</b> to start running them.
3. <b>make ssh</b> to get into the app container.
5. Once inside the container install composer vendors by running <b>composer install</b>.
4. Execute doctrine migrations to generate the database estructure using <b>php bin/console doctrine:migrations:migrate</b>
5. Then execute the doctrine fixtures to load dummy data into the database by running <b>php bin/console doctrine:fixtures:load --purge-with-truncate</b>.