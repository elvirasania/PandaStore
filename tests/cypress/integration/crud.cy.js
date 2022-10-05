describe("CRUD ELVIRA", () => {
    it("Redirect Login", () => {
      cy.visit("/");
      cy.get('[data-name="btnRedirectLogin"]').click()
    });
  
    it("Halaman Login", () => {
      cy.visit("/login");
    //   cy.get('h3.mb-5').should("have.text", "SIGN IN*");
      cy.get('[data-name="labelEmail"]').should("have.text", "Email");
      cy.get('[data-name="labelPassword"]').should("have.text", "Password");
      cy.get('[data-name="btnLoginProcess"]').contains("Login").and("be.enabled");
    });
  
    it("Tes Login Error", () => {
      cy.visit("/login");
    //   cy.get('[data-name="title"]').should("have.text", "SIGN IN*");
      cy.get('[data-name="labelEmail"]').should("have.text", "Email");
      cy.get('[data-name="labelPassword"]').should("have.text", "Password");
      cy.get('[data-name="btnLoginProcess"]').contains("Login").and("be.enabled");
  
      cy.get(".btn").click();
      cy.get(".invalid-feedback").contains("The email field is required.");
      cy.get(".invalid-feedback").contains("The password field is required.");
    });
  
    it("Tes Login Menggunakan User salah", () => {
      cy.visit("/login");
    //   cy.get('[data-name="title"]').should("have.text", "SIGN IN*");
      cy.get('[data-name="labelEmail"]').should("have.text", "Email");
      cy.get('[data-name="labelPassword"]').should("have.text", "Password");
      cy.get('[data-name="btnLoginProcess"]').contains("Login").and("be.enabled");
  
      cy.get('[data-name="textEmail"]').type("asxd@example.com");
      cy.get('[data-name="textPassword"]').type("password");
      cy.get('[data-name="btnLoginProcess"]').click();
    });
  
    it("Login Pengguna berhasil", () => {
        cy.visit("/login");
        // cy.get('[data-name="title"]').should("have.text", "SIGN IN*");
        cy.get('[data-name="labelEmail"]').should("have.text", "Email");
        cy.get('[data-name="labelPassword"]').should("have.text", "Password");
        cy.get('[data-name="btnLoginProcess"]').contains("Login").and("be.enabled");
  
        cy.get('[data-name="textEmail"]').type("bintang@gmail.com");
        cy.get('[data-name="textPassword"]').type("password");
        cy.get('[data-name="btnLoginProcess"]').click();
  
        // cy.get('[data-name="btnLogout"]').click();
    });

    it("User can Display | Create | Edit | Delete Categorys in Master Data in application", () => {
        cy.visit("/login");
        cy.get('[data-name="labelEmail"]').should("have.text", "Email");
        cy.get('[data-name="labelPassword"]').should("have.text", "Password");
        cy.get('[data-name="btnLoginProcess"]').contains("Login").and("be.enabled");

        cy.get('[data-name="textEmail"]').type("bintang@gmail.com");
        cy.get('[data-name="textPassword"]').type("password");
        cy.get('[data-name="btnLoginProcess"]').click();

        cy.get('[data-name="CategoriesLink2"]').click();
        // cy.get('[data-name="titleCategory"]').should("have.text", "Tabel Category");
        
        cy.get('[data-name="btnAddCategory"]').click();
        cy.get('[data-name="textCategory"]').type("BlackBox Testing");
        cy.get('[data-name="btnSubmitCategory"]').click();

        cy.get('[data-name="btnEditCategory8"]').click();
        cy.get('[data-name="textEditNameCategory"]').clear();
        cy.get('[data-name="textEditNameCategory"]').type("BlackBox Testing Edit");
        cy.get('[data-name="btnSubmitEditCategory"]').click();

        cy.get('[data-name="btnDeleteCategory8"]').click();
    });
  });