shareswapper
============

**This script is no longer developed with a last commit in 2008.**

<img src="https://github.com/mikexstudios/shareswapper/blob/master/screenshots/home.png" alt="home" width="60%">

a webapp to facilitate crowdsourced download links. The goal was to provide
a curated place for submitting, voting, and commenting on download links with
gamification to encourage mirroring of links.

This repository contains a `Dockerfile` built for setting up an old LAMP stack
consisting of: Debian 4.0 (Etch), Apache 2.2.3, PHP 5, and MySQL 5.0. This
setup is outdated and difficult to replicate on physical hardware but is
well-suited for a Docker image to run older PHP scripts for demonstration
purposes.

## Screenshots

<table>
<tr>
  <td align="center">
   <img src="https://github.com/mikexstudios/shareswapper/blob/master/screenshots/browse.png" alt="home" width="100%">
   <p><strong>Browsing file categories</strong></p>
  </td>
  <td align="center">
    <img src="https://github.com/mikexstudios/shareswapper/blob/master/screenshots/add.png" alt="home" width="100%">
    <p><strong>Adding a new link #1</strong></p>
  </td>
</tr>
<tr>
  <td align="center">
   <img src="https://github.com/mikexstudios/shareswapper/blob/master/screenshots/add2.png" alt="home" width="100%">
   <p><strong>Adding a new link #2</strong></p>
  </td>
  <td align="center">
    <img src="https://github.com/mikexstudios/shareswapper/blob/master/screenshots/single.png" alt="home" width="100%">
    <p><strong>Viewing an entry</strong></p>
  </td>
</tr>
<tr>
  <td align="center">
   <img src="https://github.com/mikexstudios/shareswapper/blob/master/screenshots/recent.png" alt="home" width="100%">
   <p><strong>Recently added files</strong></p>
  </td>
  <td align="center">
    <img src="https://github.com/mikexstudios/shareswapper/blob/master/screenshots/search.png" alt="home" width="100%">
    <p><strong>Searching for a file</strong></p>
  </td>
</tr>
</table>

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
