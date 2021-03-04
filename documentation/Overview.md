# Movie Project

### Overview
While some code is required, the goal of this exercise is not to build a fully functional application. Rather, it is to develop a plan for building an application and will serve as a conversation starter.

### Deliverables
Given the pseudo schema below, get started on building a CRUD API in Rest or GraphQL.

#### Provide the following:
- [ ] An application architecture document. Think of this as the document you would provide to your fellow developers to kick off the project.
    - [ ] Include a section in the architecture document above specifying the chosen language/framework for the project.
    - [ ] Include reasoning why you chose this language/framework, and, if applicable, detail the most notable third-party packages you’ll use.

#### Provide a small prototype of the application, including:
- [ ] Directory structure
- [ ] Explanation/diagram of program flow
- [ ] Code for at least one of the crud endpoints of your choosing (read or write)

### Schema
```
enum Genre {
    ACTION
    ADVENTURE
    THRILLER
    HORROR
    FANTASY
    ROMANCE
    COMEDY
}

type Movie {
    id: ID!
    title: String!
    genre: Genre!
    minutesLong: Int!
    actors: [Person]
}

type Person {
    id: ID!
    name: String!
    picture: String
}
```