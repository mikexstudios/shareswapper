shareswapper
============

**This script is no longer developed with a last commit in 2008.**

a webapp to facilitate crowdsourced download links. The goal was to provide
a curated place for submitting, voting, and commenting on download links with
gamification to encourage mirroring of links.

This repository contains a `Dockerfile` built for setting up an old LAMP stack
consisting of: Debian 4.0 (Etch), Apache 2.2.3, PHP 5, and MySQL 5.0. This
setup is outdated and difficult to replicate on physical hardware but is
well-suited for a Docker image to run older PHP scripts for demonstration
purposes.

## Usage

1. Build the `Dockerfile`:
   `docker build -t mikexstudios/shareswapper .`

2. Run it like:

   `docker run -d -p 80:80 mikexstudios/shareswapper`

   If you want to develop while running the script, mount the current 
   directory by:

   ```docker run -d -p 80:80 -v `pwd`:/var/www mikexstudios/shareswapper```

3. Then access the script from a browser at the docker's IP address. For 
   example if using boot2docker, get the exposed IP address with:
   `boot2docker ip`.

## Troubleshooting

If things go wrong, get a shell on the image for debugging:

`docker run -p 80:80 -it mikexstudios/shareswapper /bin/bash`

or connect to an already running image:

`docker exec -it [containerid] /bin/bash`
