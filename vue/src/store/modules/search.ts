import api from "../../api/api";
import State from "../../models/store/SearchModule/State";
import SearchCity from "../../models/SearchCity";
import {AxiosResponse} from "axios";

export default {
    namespaced: true,

    state: {
        search: '',
        citiesList: [],
    },

    mutations: {
        setSearch(state: State, value: string) {
            state.search = value;
        },

        setCitiesList(state: State, list: SearchCity[]) {
            state.citiesList = list;
        },
    },

    actions: {
        async searchCities({ state, commit }: { state: State, commit: Function }){
            const res: AxiosResponse<SearchCity[]> = await api.searchCities(state.search);
            commit('setCitiesList', res.data);
        },
    },
}