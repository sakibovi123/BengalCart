import React, { useEffect, useState } from 'react';
import { CiMenuBurger } from "react-icons/ci";
import { MdOutlineKeyboardArrowDown } from "react-icons/md";
import {Link} from "react-router-dom";


export default function CategoryHeader () {
    const categories = ["Category 1", "Category 2", "Category 3", "Category 4", "Category 5", "Category 6", "Category 7"];

    return (
        <div className="w-full h-full flex items-center gap-5 container mx-[2rem] my-3">
            <div
                className="text-lg flex items-center gap-4 bg-white rounded-full shadow-md p-2 w-[220px] justify-center cursor-pointer transition-all delay-150 hover:font-bold">
                <CiMenuBurger
                    className="cursor-pointer text-xl"
                />
                Categories
                <MdOutlineKeyboardArrowDown className="cursor-pointer text-xl"/>

            </div>

            <div className="w-full flex flex-wrap gap-4">
                {categories.map((category, index) => (
                    <div
                        key={index}
                        className="pointer-cursor text-white text-md transition-all delay-50 rounded-full hover:bg-gray-50 hover:text-black p-2 w-[140px] text-center"
                    >
                        <Link to={"/"}>{category}</Link>
                    </div>
                ))}
            </div>

        </div>
    )
}
