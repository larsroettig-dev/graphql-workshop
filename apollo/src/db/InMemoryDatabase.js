let data = require("./SampleStores");
let counter = 0;

function generateNewId() {
    counter++;
    return "store_" + counter;
}

function copyStore(store) {
    return store ? {...store} : store;
}

const InMemoryDatabase = {
    getAllStores() {
        return data.map(v => copyStore(v));
    },

    getStoreById(id) {
        return copyStore(data.find(v => v.id === id));
    },

    addStore(newStoreData) {
        const newStoreId = generateNewId();
        const newStore = {
            id: newStoreId,
            name: newStoreData.name,
            street: newStoreData.street,
            streetNumber: newStoreData.streetNumber,
            postCode: newStoreData.postCode,
            city: newStoreData.city,
            latitude: newStoreData.latitude,
            longitude: newStoreData.longitude,
        };

        data.push(newStore);
        return newStore;
    },

    store(store) {
        if (!store.id) {
            console.error("No ID in store object", store);
            throw new Error("No id in store " + store);
        } else {
            data = data.map(v => (v.id === store.id ? store : v));
        }
        return copyStore(store);
    }
};

module.exports = InMemoryDatabase;