FROM ubuntu:16.04

#install apache, php y suplementos
RUN apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive && \
	apt-get -y install apache2 php7.0 php7.0-mysql libapache2-mod-php curl lynx-cur
# enable apache mods

RUN a2enmod php7.0 && \
    a2enmod rewrite

# update php.ini file

RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/7.0/apache2/php.ini && \
    sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/7.0/apache2/php.ini

#declaramos variables de entorno

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

#PUERTO
EXPOSE 80

COPY www /var/www/site

#ACTUALIZAMOS EL SITIO DEFAULT CON LA CONFIGURACION QUE HEMOS CREADO

COPY apache-config.conf /etc/apache2/sites-enabled/000-default.conf

CMD /usr/sbin/apache2ctl -D FOREGROUND
