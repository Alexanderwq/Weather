import api from "../../api/api";
import State from "../../models/store/SearchModule/State";

export default {
    namespaced: true,

    state: {
        search: '',
    },

    mutations: {
        setSearch(state: State, value: string) {
            state.search = value;
        },
    },

    actions: {
        searchCities({ state }: { state: State }){
            api.searchCities(state.search);
        },
    },
}