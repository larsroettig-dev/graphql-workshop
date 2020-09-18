# Store Pickup Apollo Demo server

```
yarn install
yarn start
```

![GraphQL_Playground](https://github.com/larsroettig-dev/graphql-workshop/blob/master/apollo/doc/GraphQL_Playground.png)

*Query:*
```
query{
  stores
  {
    name
    street
    streetNumber
    postCode
  }
}
```

*Mutation:*
```
mutation{
  addStore(newStore: {
    name: "Muster Store"
    city: "Musterstadt"
    latitude: 1.3312234
    longitude: 2.39549
  }){
    id
    name
  }
}
}
```