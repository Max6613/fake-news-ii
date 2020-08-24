CREATE DATABASE IF NOT EXISTS `fakenewsii`;
USE `fakenewsii`;


CREATE TABLE IF NOT EXISTS `users`
(
    `id`       int(10) unsigned NOT NULL AUTO_INCREMENT,
    `login`    varchar(50)      NOT NULL,
    `password` varchar(255)     NOT NULL,
    `role`     varchar(50)      DEFAULT 'reader' NOT NULL ,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  AUTO_INCREMENT = 11
  CHARACTER SET utf8
  COLLATE utf8_bin;

INSERT INTO `users` (`login`, `password`, `role`)
VALUES ('admin',
        'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec',
        'administrator'),
       ('max',
        'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a',
        'redactor');


CREATE TABLE IF NOT EXISTS `posts`
(
    `id`            int(10) unsigned NOT NULL AUTO_INCREMENT,
    `date_creation` DATETIME         NOT NULL,
    `title`         varchar(100)     NOT NULL,
    `chapo`         varchar(300)     NOT NULL,
    `content`       text             NOT NULL,
    `image`         varchar(255)     NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  AUTO_INCREMENT = 11
  CHARACTER SET utf8
  COLLATE utf8_bin;

INSERT INTO `posts` (date_creation, title, chapo, content, image)
VALUES ('2020-07-14 17:18:18', 'CERISIER ALIEN',
        '<strong>EXCLUSIF!</strong> Les aliens sont parmis nous! Ils se cachent dans
        les cerisiers déguisés en fleurs. L''interview exclusive de <a href="#"
        class="a-underline">Bob l''extraterrestre</a>.',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ac orci phasellus egestas tellus
        rutrum tellus pellentesque. Sit amet nulla facilisi morbi tempus. Consequat
        semper viverra nam libero justo laoreet sit amet cursus. Pellentesque nec nam
        aliquam sem et tortor. Sit amet massa vitae tortor condimentum lacinia quis vel
        eros. Quam lacus suspendisse faucibus interdum. Diam sit amet nisl suscipit
        adipiscing bibendum est ultricies integer. Auctor eu augue ut lectus arcu. Diam
        in arcu cursus euismod quis viverra. Vitae tortor condimentum lacinia quis.
        Fermentum leo vel orci porta non pulvinar neque.
        Eget lorem dolor sed viverra ipsum nunc aliquet. Congue mauris rhoncus aenean vel
        elit scelerisque mauris. Fringilla est ullamcorper eget nulla facilisi etiam
        dignissim diam quis. Nibh nisl condimentum id venenatis a. Fermentum iaculis
        eu non diam phasellus vestibulum lorem. Adipiscing elit duis tristique
        sollicitudin. Id volutpat lacus laoreet non curabitur gravida. Quis enim lobortis
        scelerisque fermentum dui faucibus. Feugiat pretium nibh ipsum consequat nisl vel
        pretium lectus quam. Egestas tellus rutrum tellus pellentesque.
        Tortor vitae purus faucibus ornare suspendisse sed nisi lacus. Convallis a cras
        semper auctor neque. Diam quam nulla porttitor massa id neque aliquam vestibulum
        morbi. Auctor augue mauris augue neque. Nullam ac tortor vitae purus faucibus ornare
        suspendisse. Urna porttitor rhoncus dolor purus non enim praesent. Neque vitae
        tempus quam pellentesque nec nam aliquam sem et. Posuere lorem ipsum dolor sit amet
        consectetur adipiscing elit duis. Commodo ullamcorper a lacus vestibulum sed arcu
        non odio. Quam viverra orci sagittis eu. Enim lobortis scelerisque fermentum dui
        faucibus in ornare quam viverra. Adipiscing tristique risus nec feugiat in fermentum.
        Ullamcorper a lacus vestibulum sed arcu non odio. Dictumst vestibulum rhoncus est
        pellentesque elit ullamcorper dignissim cras. Nec nam aliquam sem et tortor consequat
        id porta. Faucibus purus in massa tempor. Porttitor leo a diam sollicitudin. Tincidunt
        arcu non sodales neque sodales ut etiam sit amet. Phasellus faucibus scelerisque eleifend
        donec pretium vulputate sapien nec.
        Tempor orci dapibus ultrices in iaculis. Volutpat blandit aliquam etiam erat velit. Amet
        facilisis magna etiam tempor orci eu. Morbi leo urna molestie at elementum eu facilisis
        sed. Habitant morbi tristique senectus et netus et malesuada fames ac. Quam adipiscing
        vitae proin sagittis nisl rhoncus mattis rhoncus. Imperdiet dui accumsan sit amet nulla.
        Lectus mauris ultrices eros in cursus turpis massa tincidunt dui. Amet volutpat consequat
        auris nunc. Integer enim neque volutpat ac tincidunt vitae semper quis. Eget magna
        fermentum iaculis eu non diam phasellus vestibulum. Facilisis volutpat est velit egestas
        dui. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Orci
        dapibus ultrices in iaculis nunc sed augue.
        Aenean sed adipiscing diam donec adipiscing tristique risus nec. In iaculis nunc sed
        augue lacus. In hac habitasse platea dictumst vestibulum. Eu augue ut lectus arcu
        bibendum at. Velit scelerisque in dictum non consectetur a erat. Mauris commodo quis
        imperdiet massa tincidunt. Tincidunt praesent semper feugiat nibh sed pulvinar proin.
        Massa massa ultricies mi quis. Eu turpis egestas pretium aenean pharetra magna. Amet
        consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Urna id
        volutpat lacus laoreet non curabitur. Eu nisl nunc mi ipsum faucibus. Vitae justo eget
        magna fermentum iaculis. Aliquam ut porttitor leo a. Erat imperdiet sed euismod nisi
        porta lorem mollis aliquam ut. Proin sed libero enim sed faucibus turpis in. Sed vulputate
        odio ut enim blandit. Ultricies mi quis hendrerit dolor magna eget est lorem.',
        'imgs/pic03.jpg'),
       ('2020-07-28 08:57:30', 'COMMENT RANGER UN LIVRE ?',
        'On vous ment <strong>depuis le début</strong>, il faut ranger les livres sur la
        tranche, c\'est meilleur pour leur santé mentale. Le témoignage exclusif de <a
        href="#" class="a-underline">Robert, dictionnaire de français</a>.',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ac orci phasellus egestas tellus
        rutrum tellus pellentesque. Sit amet nulla facilisi morbi tempus. Consequat
        semper viverra nam libero justo laoreet sit amet cursus. Pellentesque nec nam
        aliquam sem et tortor. Sit amet massa vitae tortor condimentum lacinia quis vel
        eros. Quam lacus suspendisse faucibus interdum. Diam sit amet nisl suscipit
        adipiscing bibendum est ultricies integer. Auctor eu augue ut lectus arcu. Diam
        in arcu cursus euismod quis viverra. Vitae tortor condimentum lacinia quis.
        Fermentum leo vel orci porta non pulvinar neque.
        Eget lorem dolor sed viverra ipsum nunc aliquet. Congue mauris rhoncus aenean vel
        elit scelerisque mauris. Fringilla est ullamcorper eget nulla facilisi etiam
        dignissim diam quis. Nibh nisl condimentum id venenatis a. Fermentum iaculis
        eu non diam phasellus vestibulum lorem. Adipiscing elit duis tristique
        sollicitudin. Id volutpat lacus laoreet non curabitur gravida. Quis enim lobortis
        scelerisque fermentum dui faucibus. Feugiat pretium nibh ipsum consequat nisl vel
        pretium lectus quam. Egestas tellus rutrum tellus pellentesque.
        Tortor vitae purus faucibus ornare suspendisse sed nisi lacus. Convallis a cras
        semper auctor neque. Diam quam nulla porttitor massa id neque aliquam vestibulum
        morbi. Auctor augue mauris augue neque. Nullam ac tortor vitae purus faucibus ornare
        suspendisse. Urna porttitor rhoncus dolor purus non enim praesent. Neque vitae
        tempus quam pellentesque nec nam aliquam sem et. Posuere lorem ipsum dolor sit amet
        consectetur adipiscing elit duis. Commodo ullamcorper a lacus vestibulum sed arcu
        non odio. Quam viverra orci sagittis eu. Enim lobortis scelerisque fermentum dui
        faucibus in ornare quam viverra. Adipiscing tristique risus nec feugiat in fermentum.
        Ullamcorper a lacus vestibulum sed arcu non odio. Dictumst vestibulum rhoncus est
        pellentesque elit ullamcorper dignissim cras. Nec nam aliquam sem et tortor consequat
        id porta. Faucibus purus in massa tempor. Porttitor leo a diam sollicitudin. Tincidunt
        arcu non sodales neque sodales ut etiam sit amet. Phasellus faucibus scelerisque eleifend
        donec pretium vulputate sapien nec.
        Tempor orci dapibus ultrices in iaculis. Volutpat blandit aliquam etiam erat velit. Amet
        facilisis magna etiam tempor orci eu. Morbi leo urna molestie at elementum eu facilisis
        sed. Habitant morbi tristique senectus et netus et malesuada fames ac. Quam adipiscing
        vitae proin sagittis nisl rhoncus mattis rhoncus. Imperdiet dui accumsan sit amet nulla.
        Lectus mauris ultrices eros in cursus turpis massa tincidunt dui. Amet volutpat consequat
        auris nunc. Integer enim neque volutpat ac tincidunt vitae semper quis. Eget magna
        fermentum iaculis eu non diam phasellus vestibulum. Facilisis volutpat est velit egestas
        dui. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Orci
        dapibus ultrices in iaculis nunc sed augue.
        Aenean sed adipiscing diam donec adipiscing tristique risus nec. In iaculis nunc sed
        augue lacus. In hac habitasse platea dictumst vestibulum. Eu augue ut lectus arcu
        bibendum at. Velit scelerisque in dictum non consectetur a erat. Mauris commodo quis
        imperdiet massa tincidunt. Tincidunt praesent semper feugiat nibh sed pulvinar proin.
        Massa massa ultricies mi quis. Eu turpis egestas pretium aenean pharetra magna. Amet
        consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Urna id
        volutpat lacus laoreet non curabitur. Eu nisl nunc mi ipsum faucibus. Vitae justo eget
        magna fermentum iaculis. Aliquam ut porttitor leo a. Erat imperdiet sed euismod nisi
        porta lorem mollis aliquam ut. Proin sed libero enim sed faucibus turpis in. Sed vulputate
        odio ut enim blandit. Ultricies mi quis hendrerit dolor magna eget est lorem.',
        'imgs/pic01.jpg'),
       ('2020-08-01 20:04:04', 'HUILE DE PALMIPEDE',
        'Des chercheurs ont découverts qu''à cause de l''huile de palme quelle contient, une
        consommation  excessive de pâte à tartiner provoquerait une mutation du pied en pâte
        de canard. <a href="#" class="a-underline">Les photos exclusives ici!</a>.',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ac orci phasellus egestas tellus
        rutrum tellus pellentesque. Sit amet nulla facilisi morbi tempus. Consequat
        semper viverra nam libero justo laoreet sit amet cursus. Pellentesque nec nam
        aliquam sem et tortor. Sit amet massa vitae tortor condimentum lacinia quis vel
        eros. Quam lacus suspendisse faucibus interdum. Diam sit amet nisl suscipit
        adipiscing bibendum est ultricies integer. Auctor eu augue ut lectus arcu. Diam
        in arcu cursus euismod quis viverra. Vitae tortor condimentum lacinia quis.
        Fermentum leo vel orci porta non pulvinar neque.
        Eget lorem dolor sed viverra ipsum nunc aliquet. Congue mauris rhoncus aenean vel
        elit scelerisque mauris. Fringilla est ullamcorper eget nulla facilisi etiam
        dignissim diam quis. Nibh nisl condimentum id venenatis a. Fermentum iaculis
        eu non diam phasellus vestibulum lorem. Adipiscing elit duis tristique
        sollicitudin. Id volutpat lacus laoreet non curabitur gravida. Quis enim lobortis
        scelerisque fermentum dui faucibus. Feugiat pretium nibh ipsum consequat nisl vel
        pretium lectus quam. Egestas tellus rutrum tellus pellentesque.
        Tortor vitae purus faucibus ornare suspendisse sed nisi lacus. Convallis a cras
        semper auctor neque. Diam quam nulla porttitor massa id neque aliquam vestibulum
        morbi. Auctor augue mauris augue neque. Nullam ac tortor vitae purus faucibus ornare
        suspendisse. Urna porttitor rhoncus dolor purus non enim praesent. Neque vitae
        tempus quam pellentesque nec nam aliquam sem et. Posuere lorem ipsum dolor sit amet
        consectetur adipiscing elit duis. Commodo ullamcorper a lacus vestibulum sed arcu
        non odio. Quam viverra orci sagittis eu. Enim lobortis scelerisque fermentum dui
        faucibus in ornare quam viverra. Adipiscing tristique risus nec feugiat in fermentum.
        Ullamcorper a lacus vestibulum sed arcu non odio. Dictumst vestibulum rhoncus est
        pellentesque elit ullamcorper dignissim cras. Nec nam aliquam sem et tortor consequat
        id porta. Faucibus purus in massa tempor. Porttitor leo a diam sollicitudin. Tincidunt
        arcu non sodales neque sodales ut etiam sit amet. Phasellus faucibus scelerisque eleifend
        donec pretium vulputate sapien nec.
        Tempor orci dapibus ultrices in iaculis. Volutpat blandit aliquam etiam erat velit. Amet
        facilisis magna etiam tempor orci eu. Morbi leo urna molestie at elementum eu facilisis
        sed. Habitant morbi tristique senectus et netus et malesuada fames ac. Quam adipiscing
        vitae proin sagittis nisl rhoncus mattis rhoncus. Imperdiet dui accumsan sit amet nulla.
        Lectus mauris ultrices eros in cursus turpis massa tincidunt dui. Amet volutpat consequat
        auris nunc. Integer enim neque volutpat ac tincidunt vitae semper quis. Eget magna
        fermentum iaculis eu non diam phasellus vestibulum. Facilisis volutpat est velit egestas
        dui. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Orci
        dapibus ultrices in iaculis nunc sed augue.
        Aenean sed adipiscing diam donec adipiscing tristique risus nec. In iaculis nunc sed
        augue lacus. In hac habitasse platea dictumst vestibulum. Eu augue ut lectus arcu
        bibendum at. Velit scelerisque in dictum non consectetur a erat. Mauris commodo quis
        imperdiet massa tincidunt. Tincidunt praesent semper feugiat nibh sed pulvinar proin.
        Massa massa ultricies mi quis. Eu turpis egestas pretium aenean pharetra magna. Amet
        consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Urna id
        volutpat lacus laoreet non curabitur. Eu nisl nunc mi ipsum faucibus. Vitae justo eget
        magna fermentum iaculis. Aliquam ut porttitor leo a. Erat imperdiet sed euismod nisi
        porta lorem mollis aliquam ut. Proin sed libero enim sed faucibus turpis in. Sed vulputate
        odio ut enim blandit. Ultricies mi quis hendrerit dolor magna eget est lorem.',
        'imgs/pic02.jpg');


CREATE TABLE IF NOT EXISTS `settings`
(
    `id`       int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name`    varchar(50)      NOT NULL,
    `value` varchar(255)     NOT NULL,
    primary key (id)
) ENGINE = InnoDB
  AUTO_INCREMENT = 11
  DEFAULT CHARSET = utf8;

INSERT INTO `settings` (`name`, `value`)
VALUES ('#index-phrase', 'IL REVIENT ET IL EST PAS CONTENT ! MYTHONÉ EN PHP ET MYSQL.'),
       ('#truc-phrase', 'MAIS PUISQU''ON VOUS DIT QUE C''EST VRAI !'),
       ('#redac-phrase', 'LES REDACTEURS SONT LES MEILLEURS'),
       ('#admin-phrase', 'L''ADMINISTRATION ...'),
       ('#admin-phrase', 'LES MENTIONS ILLEGALES C''EST PAS TRES LEGAL !');
