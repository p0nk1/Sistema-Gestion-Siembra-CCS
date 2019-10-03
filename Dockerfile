FROM debian:wheezy

MAINTAINER ChAaGgYy chaaggyy@gmail.com  https://hub.docker.com/u/chaaggyy/

#Actualizacion \ instalacion de utilidades \ habilitar el modulo rewrite de apache
RUN apt-get update && \
    apt-get install -y apache2 && \
    apt-get install -y php5 php5-pgsql php5-mcrypt php5-curl php5-gd && \
    apt-get install -y libapache2-mod-php && \
    apt-get install -y curl
    

#habilitar Rewrite de apache2
RUN  a2enmod rewrite

#Expose apache
EXPOSE 80

#configuraciones de apache copia el archivo a 000-default.conf
ADD 000-default.conf /etc/apache2/sites-enabled/000-default.conf
ADD ["info.php","/var/www/html/"]

#reiniciando el servicio de apache (fue comentado ya que en ciclo de creacion no hay servicios activos)
#RUN service apache2 restart

#lanza apache en segundo plano
ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

#CMD /usr/sbin/apache2ctl -D FOREGROUND
