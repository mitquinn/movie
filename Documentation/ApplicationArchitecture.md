###Hello Future Developer.

Welcome to the _Movie Project_. This is a quick architecture document that is going to go over a few of the interesting points of the _Movie Project_. Hopefully this document will lay out the building blocks for future progress.

#### Considerations
* **Time** 
  * I am short on time, so I want to give you as much as possible to help you continue.
* **Scope** 
  * I don't have a lot of information about this project, so I want to build things to be as flexible and expandable as possible.
* **Standardization**
  * Other people will be working on this project, sticking to a standards will be helpful in keeping the code uniform. 
    
#### Design Decisions
* Language
    * I will be using PHP as the programming language. This is mostly personal bias as it is the language I am the most comfortable with.
    * For a project like this; with such an ambiguous scope; just about any major language would be acceptable.
    * I will be using the latest version supported by any required frameworks/packages.
* Framework
    * I will be using the Laravel framework. (Of all the PHP frameworks, I would probably only pick Laravel or Symfony)
    * This is a major PHP framework with tons of support and popularity.
    * It will be easy for new developers to onboard.
    * There are lots of 3rd party packages that will allow for expansion of the project.
    * Laravel is an MVC framework, making it easy to follow what is going on.
* Packages
    * Laravel Passport - Pretty straight-forward OAuth2 Server.
    * Phpunit - Again pretty straight forward, used for unit tests.
* Other
    * Composer - Standard dependency manager for PHP.
    * Docker - To handle the development environment.

#### ERD

MOVIE
  belongsToMany GENRE
  hasMany ROLE
  hasManyThrough PERSON through ROLE
  morphToMany PICTURE
    
GENRE
  belongsToMany MOVIE

PERSON
  hasMany ROLE
  morphToMany PICTURE

ROLE - I am thinking this makes more sense than connecting people directly to movies. A person could have multiple roles in a movie/movies (director, lead actor, support, etc).
  belongsTo MOVIE
  belongsTo PERSON
    
PICTURE - Rather than attaching a single photo to a person lets just make a PICTURE entity that we can attach to MOVIE and PERSON. Little extra work, tons of bang for buck. 
  morphedByMany MOVIE
  morphedByMany PERSON

#### Database Design

genres
* id - primary
* name - string
* timestamps

movies
* id - primary
* title - string, required
* runtime - int, required
* timestamps

roles - pivot between movies/persons
* id - primary
* movie_id - index
* person_id - index
* type - string , (actor, director producer, etc)
* timestamps

persons
* id - primary
* name - string, required
* timestamps

pictures (polymorphic)
* id - primary
* picture_url - string 
* picturable_id - index
* picturable_type - string
* timestamps

genre_movie
* id - primary
* genre_id - foreign genres.id , index
* movie_id - foreign movie.id , index
* timestamps



 




