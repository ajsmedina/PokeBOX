# PokeBOX: Pokemon Team Analyzer

PokeBOX is a probject that allows users to log in, add Pokemon to their virtual box, and select teams of their own Pokemon to be
analyzed for type matchups, allowing them to edit their team to perform with peak coverage.

# What's In the Box?

PokeBOX is written using PHP and uses MySQL databases to store the Pokemon and their corresponding game data.

By integrating the MySQL databases, users can insert and retrieve relevant data that allows for a simple user interface
to let them create teams and note their weaknesses.

# Using New Tools

Game data is fetched from PokeAPI (https://pokeapi.co/), a free resource that contains all the data on Pokemon species, moves, and types.
PHP scripts are run that uses MySQL to extract this information and store it into relevant databases for later use.

The project is hosted on AlterVista, a free web hosting site, since it allows me to use PHP and MySQL scripts necessary for this
project's completion.

# How It Works: Competitive Pokemon

While Pokemon is a fun game targeted for kids, it also has a deeper layer of competitive play. There are various unique factors
to each Pokemon. They each have a special ability that triggers certain effects, they each have a special personality (nature) that
affects their stats, and they each have "effort values" that increase their stats based on how they were trained. PokeBOX takes all
this information as input from the user then collects the information for the team.

This allows PokeBOX to assess type matchups such as how well the team can handle Electric-type Pokemon like Pikachu. It also allows
PokeBOX to add up the user's total stats and mention what types of Pokemon can potentially counter the user's team. For example,
if the user has multiple Pokemon weak to Fairy-type attacks with low Special Defence, a Fairy-type Special Attack can easily deal with most of the user's team. This is why PokeBOX exists! It's useful for competitve Pokemon as well as just making a good, fun team in general.
