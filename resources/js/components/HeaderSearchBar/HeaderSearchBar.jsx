import React from "react";
import { Link } from "react-router-dom";
import { IoSearch } from "react-icons/io5";

const HeaderSearchBar = () => {
    return (
        <div className=" flex-1 bg-white pl-5 pr-2 py-1.5 rounded-full flex items-center">
            <input
                type="text"
                name=""
                id=""
                className="w-full outline-none"
                placeholder="t shirt for men free shipping"
            />

            <Link>
                <button className="bg-customBlack flex items-center px-4 py-1 text-2xl text-white rounded-full">
                    <IoSearch />
                </button>
            </Link>
        </div>
    );
};

export default HeaderSearchBar;
