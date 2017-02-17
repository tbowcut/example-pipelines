# Pipelines Environments proof of concept

This example is a proof of concept of integrating GitHub, Pipelines, and Cloud
on demand environments (ODE).

Additional resources:

* [Pipelines Environments feature brief](https://docs.google.com/document/d/1QucNwQPSRtz1kfymb3ZQd3ow-soGEsZAZMo_pD9mMsw/edit#) describes the business value, use cases, user experience, and competitive landscape for this feature.
* [Demo video](https://drive.google.com/file/d/0BxJ0MNQFg_kYbU55eV9fX3owSUE/view)
  (4:56) shows this example code in use.  The video was recorded using a prior
  ("Pfizer") version of Cloud ODE, but the example code and instructions below
  now use the new Cloud ODE built specifically for Alicorn.  There is no
  behavioral change in how the example code works.

The proof of concept code lives in the environments directory. It is a PHP
program that uses the Cloud API (aka N3 API) to dynamically create, configure,
and later delete Cloud on demand environments. The Pipelines YAML file runs
this program when a build is successful in order to create a new on-demand
environment that the build artifact will be deployed to. The reason this
approach is a "proof of concept" is that ultimately this capability will be
built into Pipelines directly with YAML file support for specifying the
deployment target, including on on-demand environment, and not by explicitly
running a program that you must include in your own repo.

To experiment with this proof of concept yourself:

* Contact Mark Winberry mark.winberry@acquia.com, provide your Acquia Cloud Enterprise site name,
  and ask to have ODE enabled for it.
* Copy the acquia-pipelines.yaml file and environments directory into your own
  repo from the environments branch of the pipelines-labs-internal repo.
* Validate that you have successfully configured your Pipelines credentials by
running ```pipelines list-applications``` and confirming that it works.
* Provide the N3_KEY and N3_SECRET environment variables containing your Cloud
  API credentials. They are in ```$HOME/.acquia/pipelines/credentials```. Note
  that these are the new Cloud API Tokens, not the legacy Cloud API credentials
  (*).  Then,
  * Copy the n3_key from the credentials file to the N3_KEY variable in the
    YAML file.
  * Copy the n3_secret from the credentials file and run this command: ```echo
    -n '<<your secret>>' | pipelines encrypt - --add variables.global.N3_SECRET```
* Modify the ```build_site```step in the YAML file however you want.
* Run a build either with the ```pipelines start``` command or with a push to
  GitHub if you have enabled GitHub integration.

(*) This just in: Calling two different APIs "Cloud API version 1" is a recipe
for confusion.
