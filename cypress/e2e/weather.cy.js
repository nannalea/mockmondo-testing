/// <reference types="Cypress" />
import dayjs from "dayjs";

describe("Check the weather in destination", () => {
	beforeEach(() => {
		cy.visit(Cypress.env("URL"));
	});

	it("Select a city", () => {
		cy.get(".city_card").first().click();
	});

	// is url view_weather.php?city=Stockholm
	it("Check if url is correct", () => {
		cy.get(".city_card").first().click();
		cy.url().should("include", "/view_weather.php");
	});

	it("returns weather data for a given city", () => {
		cy.visit(Cypress.env("URL") + "/view_weather.php?city=nice");

		cy.get("#widget_container").contains("Nice");

		const today = dayjs().format("YYYY-MM-DD");
		cy.get("#widget_container").should("contain", today);
	});

	it("Search for a new city", () => {
		cy.visit(Cypress.env("URL") + "/view_weather.php?city=nice");
		cy.get("#city_input").type("Miami");
		cy.get("#destination_search_button").click();

		cy.get("#widget_container").contains("Miami");

		const today = dayjs().format("YYYY-MM");
		cy.get("#widget_container").should("contain", today);
	});
});
