import React from "react";
import PropTypes from "prop-types";
import { NavLink } from "react-router-dom";

const HeaderSignInDropdownItems = ({ logo: Logo, itemTitle }) => {
    return (
        <NavLink>
            <div className="group hover:bg-gray-200 flex items-center gap-1 px-3 py-2 duration-200 rounded-md">
                {Logo && <Logo />}

                <p className="group-hover:text-red-500 duration-200">
                    {itemTitle}
                </p>
            </div>
        </NavLink>
    );
};

HeaderSignInDropdownItems.propTypes = {
    logo: PropTypes.any,
    itemTitle: PropTypes.string,
};

export default HeaderSignInDropdownItems;
