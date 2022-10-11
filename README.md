# Pargo Pre-Interview Task
-  I've used Laravel to implement CRUD operations for Currency Exchange Rates 


# Install
- extract the .zip file or download using `https://github.com/khaledsabbah/pargo.git`
- `cd pargo` <small> ( go to task location )</small>
- ` mv .env.example  .env`
- `chmod 755 -R storage/logs/`
- `chmod 777 -R storage/framework/sessions/`
- `chmod 777 -R storage/framework/views/`
- `chmod 777 -R storage/framework/cache/`
- `chmod 777 -R bootstrap/cache/`

# Optmize Application
`php artisan optimize:clear`

# Running Server
`php artisan serve --port=8089`

# Links
*        Register :   http://localhost:8089/register
*        Login :      http://localhost:8089/login
*        User Currency Rates Searchs :      http://127.0.0.1:8001/currency-exchange

## Code Desgin and Architect
I tried to apply S.O.L.I.D principles & use some design pattern and Hydrate everything into object as possible.

#### Patterns used:
- ``Service Pattern``  Calling repository if any, retrieving data and aggregate multiple processes.
- ``Factory Pattern``   Create an Advertiser object on the fly .
- ``Hydrator Pattern``  Hydrate inputs ( eg. data ) into entities .
- ``Composite Entity Pattern``  Applying composition and relations between Entities.
- ``Transformer Pattern``  Transform response object to and JSONable type like Array .

# WorkFlow
- `Controller` calls `Service` Method to fetch data
- `Hydrators` used to hydrate data using `Entities`.
- `Repositories` used do our DB logic
- `Transformers` used to transform the result.
- 
