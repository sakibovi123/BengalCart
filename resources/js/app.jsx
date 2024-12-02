// resources/js/app.jsx
import React from "react";
import ReactDOM from "react-dom/client";
import "../css/app.css";
import { createBrowserRouter, RouterProvider } from "react-router-dom";
import Root from "./pages/Root/Root";
import Home from "./pages/Home/Home";
import ErrorPage from "./pages/ErrorPage/ErrorPage";
import CartPage from "./pages/CartPage/CartPage";

const router = createBrowserRouter([
    {
        path: "/",
        element: <Root></Root>,
        errorElement: <ErrorPage></ErrorPage>,
        children: [
            {
                path: "/",
                element: <Home></Home>,
            },
            {
                path: "/cartPage",
                element: <CartPage></CartPage>,
            },
        ],
    },
]);

function App() {
    return <RouterProvider router={router}></RouterProvider>;
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
