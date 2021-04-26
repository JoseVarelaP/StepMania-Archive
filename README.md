<center>
<img src="https://github.com/JoseVarelaP/StepMania-Archive/blob/master/Headers/About.png?raw=true">
</center>

The StepMania archive is a side project created by Jose_Varela to collect and preserve almost everything from StepMania, and the contents made by the community itself. This repository will allow people to add entries or improvements to the archive, via pull requests or site upgrades from their JS code.

The site will (mostly) be updated every 2-3 days if there's activity on it, or unless a big update has been done on it, in which otherwise I'll try to update as fast as I can.

It started back in 2017 with the Build Archive, which initially was to keep handy older builds due to testing with simfiles and themes. But eventually, it kept growing exponentially to the point that the entire archive had to do 3 reallocations due to storage limitations.

Originally, the archive was only linked at the UKSRT server, but at mid 2018, it started to gain attention from the community at large. They were really interested on a archive like site for the engine.

Parts of this repository (like the changelog viewer) use [marked](https://github.com/markedjs/marked).

## How to run

The site has been tested using PHP 7.3.24, but should work on earlier versions.

- Clone the repository using git and go to the folder.
```bash
git clone git@github.com:JoseVarelaP/StepMania-Archive.git
cd StepMania-Archive
```

- Start a local PHP server in a localhost to run, then access the page on a web browser.
```bash
php -S localhost:8888
```