module.exports = `
type Store {
 id: ID!
 name: String!
 street: String
 streetNumber: String
 postCode: String
 city: String!
 latitude: Float!
 longitude: Float!
}

type Query {
  ping(msg: String): String!
  stores: [Store!]!
  storeById(id: ID!): Store!
}

input NewStore {
 name: String!
 street: String
 streetNumber: String
 postCode: String
 city: String!
 latitude: Float!
 longitude: Float!
}

type Mutation {
   addStore(newStore: NewStore!): Store!
}

type Subscription {
  onNewStore(storeId: ID): Store!
}

 `;