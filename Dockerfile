# This Dockerfile is optional, its only to "package" the app
#  inside a symfony web container, for easier distribution
FROM beubi/symfony2:web

COPY . /srv/ubicycling/
RUN composer install
