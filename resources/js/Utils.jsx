import axios from "axios";
import {useState} from "react";

const localURL = 'http://localhost:7000/'
const stagingUrl = ''
const productionUrl = ''

export default function Utils () {

    const getToken = () => {
        const tokenString = localStorage.getItem('token')
        return JSON.parse(tokenString)
    }

    const getUser = () => {
        // const userString = sessionStorage.getItem("user")
        const userString = localStorage.getItem("user")
        return JSON.parse(userString)
    }

    const [ token, setToken ] = useState(getToken())
    const [ user, setUser ] = useState(getUser())

    const http = axios.create({
        baseURL: localURL,
        headers: {
            "Content-Type": "application/json"
            // Authorization: `Bearer ${token}`
        }
    })

    const saveToken = (user, token) => {
        localStorage.setItem("token", JSON.stringify(token));
        localStorage.setItem("user", JSON.stringify(user));
        setToken(token);
        setUser(user);

        setTimeout(() => {
            window.location.href = "/";
        }, 1200);
    };

    const logOut = () => {
        localStorage.clear()
    }

    const updateToken = async () => {
        await http
            .post("/api/token/refresh/", {
                refresh: token.refresh
            })
            .then((response) => {
                setToken(response.data.refresh);
            });
    };

    return {
        http,
        setToken: saveToken,
        token,
        user,
        setUser,
        logOut,
        getUser,
        getToken
    }

}
