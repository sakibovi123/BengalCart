import React from "react";
import HeaderSearchBar from "../HeaderSearchBar/HeaderSearchBar";
import HeaderSignInOrRegister from "../HeaderSignInOrRegister/HeaderSignInOrRegister";
import { CiShoppingCart } from "react-icons/ci";
import {Link, useNavigate} from "react-router-dom";
import CategoryHeader from "../CategoryHeader/CategoryHeader.jsx";
import { CiMenuBurger } from "react-icons/ci";

const Header = () => {
    const navigate = useNavigate();

    const handleHeaderCartSectionClick = () => navigate("/cartPage");

    return (
        <div className="bg-customBlack sticky top-0 z-40 w-full py-3">

            <div className="custom-container flex items-center gap-8">
                <h2 className="text-3xl text-white uppercase">
                    <Link to={"/"}>Bengal Cart</Link>
                </h2>

                <HeaderSearchBar></HeaderSearchBar>

                <div className="flex gap-5">
                    <HeaderSignInOrRegister></HeaderSignInOrRegister>

                    {/* Header cart element */}
                    <div
                        className="flex text-xs text-center text-white gap-1.5 cursor-pointer"
                        onClick={handleHeaderCartSectionClick}
                    >
                        <div className="text-[2rem] ">
                            <CiShoppingCart />
                        </div>

                        <div>
                            <p className="text-customBlack bg-white rounded-full">
                                0
                            </p>
                            <p>Cart</p>
                        </div>
                    </div>
                </div>
            </div>
            <CategoryHeader />
        </div>
    );
};

export default Header;
