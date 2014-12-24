# An example Ubuntu container for a web application
FROM tutum/apache-php
#udpate php.ini
RUN sed -i "s/display_errors = Off/display_errors = On/" /etc/php5/apache2/php.ini
RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php5/apache2/php.ini
# RUN apt-get update && apt-get install -yq git && rm -rf /var/lib/apt/lists/*
# # Start Apache and expose port
# ENV APACHE_RUN_USER www-data
# ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
EXPOSE 80
# CMD composer install
