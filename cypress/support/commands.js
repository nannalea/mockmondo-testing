// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//
// -- This will overwrite an existing command --
// Cypress.Commands.overwrite('visit', (originalFn, url, options) => { ... })
Cypress.Commands.add("login", (email, password) => {
  // check if url is /login
  cy.visit(Cypress.env("URL") + "/login");

  cy.url().should("include", "/login");

  // type in email and password
  cy.get("input[type=email]").type(`${email}`);
  cy.get("input[type=password]").type(`${password}`);

  // click on login button
  cy.get(".btn-login").click();

  //check if url is /home
  cy.url().should("include", "/home");
  // visit the desired URL inside the callback function
});
