FROM php:8.3-apache

# Set working directory
WORKDIR /app

ARG WWW_USER

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    npm \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pgsql pdo_pgsql mbstring exif pcntl bcmath gd zip curl intl

# Copy vhost config
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache mods
RUN a2enmod rewrite

# Get latest Composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Create user
RUN groupadd --force -g $WWW_USER webapp
RUN useradd -ms /bin/bash --no-user-group -g $WWW_USER -u $WWW_USER webapp

# Copy application code
COPY . /app

# Copy entrypoint script
COPY entrypoint.sh /app/entrypoint.sh

# Set permissions for entrypoint script
RUN chmod +x /app/entrypoint.sh

# Set entrypoint
# ENTRYPOINT ["/app/entrypoint.sh"]

# Clean cache
RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*



# Switch to the webapp user
USER ${WWW_USER}

# UNCOMMENT THE FOLLOWING LINE BEFORE USING THE SCRIPT
## ENTRYPOINT ["/app/entrypoint.sh"]
