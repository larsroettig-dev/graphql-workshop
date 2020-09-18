
const {
    ApolloServer,
    PubSub,
    withFilter
} = require("apollo-server");
const typeDefs = require("./schema");
const database = require("./db/InMemoryDatabase");

const slowDown = process.argv[2] && process.argv[2] === "slowMode";

const pubsub = new PubSub();

const resolvers = {
    Query: {
        ping: (_, { msg }) => `Hello, ${msg || "World"}`,
        stores: () => database.getAllStores(),
        storeById: (_, { id }) => database.getStoreById(id)
    },

    Mutation: {
        addStore: (_, { newStore }) => {
            return database.addStore(newStore);
        }
    },

    Subscription: {
        onNewStore: {
            resolve: payload => payload.store,
            subscribe: withFilter(
                (_s, _a, { pubsub }) => pubsub.asyncIterator("RegisterChoiceEvent"),
                (payload, variables) => {
                    return variables.storeId ? variables.storeId === payload.store.id : true;
                }
            )
        }
    }
};

const server = new ApolloServer({
    typeDefs,

    resolvers,

    context: (_req, con) =>
        slowDown && !con
            ? new Promise(res => {
                setTimeout(() => res({ pubsub }), 2000);
            })
            : { pubsub },

    formatError: err => {
        console.error(err.originalError || err);
        return err;
    },

    playground: {
        // Playground runs at http://localhost:4000
        settings: {
            "editor.theme": "light",
            "schema.polling.enable": false
        }
    }
});

server.listen().then(({ url }) => {
    console.log(`  Server ready at ${url}`);
});