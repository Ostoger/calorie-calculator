FROM php:8.1-fpm

RUN ln -s /usr/local/bin/php /usr/bin/php

# Get frequently used tools
RUN apt-get update && apt-get install -y \
    build-essential \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libpq-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    unzip \
    jpegoptim optipng pngquant gifsicle \
    git \
    curl \
    wget \
    zsh \
    locate \
    npm \
    nodejs

RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached-3.2.0 \
    && docker-php-ext-enable memcached

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-configure zip

RUN docker-php-ext-install \
        bcmath \
        mbstring \
        pcntl \
        intl \
        zip \
        opcache \
        pdo_pgsql

RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# Configure non-root user.

ARG PUID
ENV PUID ${PUID}
ARG PGID
ENV PGID ${PGID}
ARG UNAME=devuser
ENV UNAME ${UNAME}

RUN groupadd -g $PGID -o $UNAME
RUN useradd -m -u $PUID -g $PGID -o -s /bin/bash $UNAME

# install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#install yarn
RUN npm install --global yarn

RUN npm install -D vue-loader vue-template-compiler

# forward private ssh key from host
ARG SSH_KEY_NAME
RUN mkdir ~/.ssh \
    && ln -s /run/secrets/my_ssh_key ~/.ssh/$SSH_KEY_NAME

# change user
USER $UNAME

CMD ["php-fpm"]
