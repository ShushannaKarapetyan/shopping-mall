## Shopping Mall

This is basic REST API (CRUD) to manipulate a list of products in the database.
There is also login functionality ("/api/login") to protect some endpoints.

- Categories should consist of a title and description fields.
- You don’t need to create a CRUD for categories, so you may just fill this table with
  some test data manually.
- Products consist of a title, description, SKU, and price fields.
- SKU is an alphanumeric identification of the product in the catalog, it is unique
  and has exactly 8 characters.
- Each product belongs to one category.
- The product details endpoint (GET /api/products/{id}) shows also the category relationship to which each product belongs.

---
**NOTE**

**Please run this command to migrate tables and create Admin (email: admin@example.com, password: password)**
```bash
$ php artisan migrate --seed
```
