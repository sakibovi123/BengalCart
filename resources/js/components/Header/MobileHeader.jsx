import React, { useEffect, useState } from "react";
import {CiMenuBurger, CiShoppingCart} from "react-icons/ci";

export default function MobileHeader()
{
    return (
        <div className="bg-customBlack sticky top-0 z-40 w-full py-3">
            <div className="p-3 flex items-center justify-between text-white">
                <CiMenuBurger className="text-[2rem]"/>
                <div className="text-[2rem] ">
                    <CiShoppingCart/>

                </div>
            </div>
        </div>
    )
}

