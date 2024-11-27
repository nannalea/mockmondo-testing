/// <reference types="Cypress" />

describe("Search for flight", () => {
	beforeEach(() => {
		cy.visit(Cypress.env("URL"));
	});

	it("Search and select cities", () => {
		cy.get("#from-input").type("C");
		cy.get("#from-results").should("be.visible");

		// click the element containing the nested child that contains "Copenhagen"
		cy.contains(".from-city-name", "Copenhagen").parents().eq(3).click();
		// Check if the clicked element has been inserted into the input field
		cy.get("#from-input").should("have.value", "Copenhagen");

		cy.get("#to-input").type("H");
		cy.get("#to-results").should("be.visible");

		// click the element containing the nested child that contains "Helsinki"
		cy.contains(".to-city-name", "Helsinki").parents().eq(3).click();
		// Check if the clicked element has been inserted into the input field
		cy.get("#to-input").should("have.value", "Helsinki");

		cy.get("form button").click();
		cy.url().should("include", "/view_search_results");
	});

	it("Assert flight cities", () => {
		// go to search rsults page as in the above test
		cy.get("#from-input").type("C");
		cy.contains(".from-city-name", "Copenhagen").parents().eq(3).click();
		cy.get("#to-input").type("H");
		cy.contains(".to-city-name", "Helsinki").parents().eq(3).click();
		cy.get("form button").click();

		// assert flight ticket contains the searched cities
		cy.contains(".flight_card .left .from_flight .destination", "Copenhagen");
		cy.contains(".flight_card .left .to_flight .destination", "Helsinki");
	});

	// use keyboard to search for departure city
	it("Use keyboard to search for departure city", () => {
		cy.get("#from-input").type("C");
		cy.get("#from-results").should("be.visible");

		// find index of #from-city that contains "Copenhagen"
		cy.get(".from-city-name").each(($el, index, $list) => {
			if ($el.text() === "Copenhagen") {
				cy.get("#from-input").type("{downarrow}".repeat(index + 1));
				// get element in focus and check if background is #ebe6ef; if so, press enter
				cy.focused().should("have.css", "background-color", "rgb(235, 230, 239)");
				cy.focused().type("{enter}");
				// Check if the clicked element has been inserted into the input field
				cy.get("#from-input").should("have.value", "Copenhagen");
			}
		});
	});

	// use keyboard to search for arrival city
	it("Use keyboard to search for arrival city", () => {
		cy.get("#to-input").type("H");
		cy.get("#to-results").should("be.visible");

		// find index of #to-city that contains "Helsinki"
		cy.get(".to-city-name").each(($el, index, $list) => {
			if ($el.text() === "Helsinki") {
				cy.get("#to-input").type("{downarrow}".repeat(index + 1));
				// get element in focus and check if background is #ebe6ef; if so, press enter
				cy.focused().should("have.css", "background-color", "rgb(235, 230, 239)");
				cy.focused().type("{enter}");
				// Check if the clicked element has been inserted into the input field
				cy.get("#to-input").should("have.value", "Helsinki");
			}
		});
	});
});
