# Refactoring Kata Test

## Introduction

Let's say we are a company specialized in merchandise transport in different countries, and we have some message templates we want to send
in different languages. To do that, we've developed `TemplateManager` whose job is to replace
placeholders in texts by travel related information.

`TemplateManager` is a class that's been around for years and nobody really knows who coded
it or how it really works. Nonetheless, as the business changes frequently, this class has
already been modified many times, making it harder to understand at each step.

Today, once again, the PO wants to add some new stuff to it and add the management for a new
placeholder. But this class is already complex enough and just adding a new behaviour to it
won't work this time.

Your mission, should you decide to accept it, is to **refactor `TemplateManager` to make it
understandable by the next developer** and easy to change afterwards. Now is the time for you to
show your exceptional skills and make this implementation better, extensible, and ready for future
features.

Sadly for you, the public method `TemplateManager::getTemplateComputed` is called everywhere, 
and **you can't change its signature**. But that's the only one you can't modify (unless explicitly
forbidden in a code comment), **every other class is ready for your changes**.

This exercise **was made to not last longer than 1 hour** but we know that this can be too short to do it all and
you might take longer if you want. Stop when you feel you've done something you feel comfortable sharing with us.

You can run the example file to see the method in action.

## Rules
There are some rules to follow:
 - You must commit regularly
 - You must not modify code when comments explicitly forbid it

## Deliverables
What do we expect from you:
 - the link of the git repository
 - several commits, with an explicit message each time
 - a file / message / email explaining your process and principles you've followed

**Good luck!**


######################################################################################
######################################################################################

# Result

## Process
 - Analysis of the existing
 - Update php version into composer.json
 - Modeling the different action types into Handlers
 - Creation of an QuoteHandlerInterface to define the two methods that each handler will implement
 - Separation of handlers by type (QuoteDestination, QuoteSummary and QuoteUser)
 - For each type of handler, the creation of an abstract class to serve as a base for derived classes
 - Create QuoteHandlerRegistry to loop on each handler, check if support and process to replace text
 - Implement the QuoteHandlerRegistry into TemplateManager
 - Cleaning the TemplateManager

## List of evolutions or missing parts
 - Add a higher level of abstraction to avoid code duplication between abstract classes
 - Make unit tests to test in depth the different handlers
 - Creation of validators to check the input data
