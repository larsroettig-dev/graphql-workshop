# A GraphQL training for Magento 2
This repository hold all my workshop material for give a GraphQL
training presentations would be in german but code is in english. 

## Requirements:
* [ ] Vanilla Magento *2.4.x*
* [ ] Mysql 5.6
* [ ] Elasticsearch 7.0
* [ ] Node 10
* [ ] GraphQL client 
    * https://altair.sirmuel.design/
    
## Preparation before training can start
```bash
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition graphqlworkshop
valet.sh db create graphqlworkshop
cd graphqlworkshop
valet.sh link graphqlworkshop php73
php7.3 bin/magento setup:install --base-url=https://graphqlworkshop.test/ --db-host=localhost --db-name=graphqlworkshop --db-user=root --db-password=root --admin-firstname=Magento --admin-lastname=User --admin-email=user@example.com --admin-user=admin --admin-password=admin123 --language=en_US --currency=USD --timezone=America/Chicago --use-rewrites=1 --search-engine=elasticsearch7 --elasticsearch-port=9207 
```

## What we learn 

* [ ] What is GraphQL
* [ ] Difference to Rest
* [ ] Basic Query and Syntax based on (Apollo server)
* [ ] GraphQL Mutation (Apollo server)
* [ ] Difference from GraphQL spec to magento implementation
* [ ] How to develop a Basic Magento Module
* [ ] How to develop a Basic Magento GraphQL Module
* [ ] How to develop a GraphQL Query 
* [ ] How to develop a GraphQL Query Filter
* [ ] How to develop a GraphQL Mutation
* [ ] GraphQL Security basics 
* [ ] How to add unit test
* [ ] How do cover your Module with an Integration test

### What is GraphQL and Difference to Rest

@todo 

### Apollo server basic


### Basic Magento GraphQL Module

I will show how you can build your GraphQL for Magento **2.4** and extend them with a filter logic. 
Our use case is a Product review endpoint.

 As a frontend developer, I need  Endpoint to search for the next Pickup Store in a Postcode Area.
 Use a setup script initial import
 Allow search for Postcode or Name.
 API will return the  following  attributes for a Pickup Store.
 
 <table class="table-auto w-full">
   <thead>
     <tr class="border bg-gray-100">
       <th class="px-4 py-2">Attribute Name</th>
       <th class="px-4 py-2">GraphQL field</th>
       <th class="px-4 py-2">Data Type</th>
     </tr>
   </thead>
   <tbody>
     <tr>
      <td class="border px-4 py-2">Name</td>
      <td class="border px-4 py-2">name</td>
      <td class="border px-4 py-2">string</td>
     </tr>
     <tr>
       <td class="border px-4 py-2">Postcode</td>
       <td class="border px-4 py-2">postcode</td>
       <td class="border px-4 py-2">string</td>
     </tr>
     <tr>
       <td class="border px-4 py-2">Street</td>
       <td class="border px-4 py-2">street</td>
       <td class="border px-4 py-2">string</td>
     </tr>
     <tr>
       <td class="border px-4 py-2">Street Number</td>
       <td class="border px-4 py-2">street_num</td>
       <td class="border px-4 py-2">int</td>
     </tr>
     <tr>
       <td class="border px-4 py-2">City</td>
       <td class="border px-4 py-2">city</td>
       <td class="border px-4 py-2">string</td>
     </tr>
     <tr>
       <td class="border px-4 py-2">Longitude</td>
       <td class="border px-4 py-2">longitude</td>
       <td class="border px-4 py-2">decimal</td>
     </tr>
       <tr>
       <td class="border px-4 py-2">Latitude</td>
       <td class="border px-4 py-2">latitude</td>
       <td class="border px-4 py-2">decimal</td>
     </tr>
   </tbody>
 </table>
 
