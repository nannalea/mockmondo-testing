/// <reference types="Cypress" />

describe("Login as admin and delete flight", () => {
  beforeEach(() => {
    cy.visit(Cypress.env("URL"));
  });

  it("Login with valid email", () => {
    cy.get("#btn-login").click();

    // check if url is /login
    cy.url().should("include", "/login");

    cy.login("a@a.com", "password");
    cy.visit(Cypress.env("URL"));

    // check if user is logged in button test is "Sign out"
    cy.get("#btn-login").contains("Sign out");
  });

  it("Go to admin page", () => {
    cy.login("a@a.com", "password");
    cy.visit(Cypress.env("URL"));
    // Go to admin page
    cy.get("#admin-link").click();

    // check if url is /admin
    cy.url().should("include", "/admin");

    // Check if session user_name that has been stored as cookie is Anna
    cy.get("h1").contains("Anna");
  });

  it("Delete flight", () => {
    cy.login("a@a.com", "password");
    cy.visit(Cypress.env("URL") + "admin");
    // Intercept the POST request to the api-delete-flight-from-db.php endpoint
    cy.intercept("POST", "api-delete-flight-from-db.php", {
      statusCode: 200,
      body: { info: "flight delete" },
    }).as("deleteFlight");

    // Click the delete the first button .btn-delete
    cy.get(".btn-delete").first().click();

    // Wait for the POST request to complete
    cy.wait("@deleteFlight");

    // sign out
    cy.get("#btn-login").click();

    // check if url is /home
    cy.url().should("include", "/home");

    // check if user is logged in button test is "Sign in"
    cy.get("#btn-login").contains("Sign in");

    // Admin is not visible in dom
    cy.get("#admin-link").should("not.exist");

    // session storage is empty
    cy.window().then((win) => {
      expect(win.sessionStorage.length).to.equal(0);
    });
  });
});
