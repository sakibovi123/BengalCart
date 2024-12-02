import { easeOut } from "motion";
import { AnimatePresence, motion } from "motion/react";
import React, { useEffect, useRef, useState } from "react";
import { IoPersonOutline } from "react-icons/io5";
import { MdOutlineKeyboardArrowDown } from "react-icons/md";
import { itemsWithLogos } from "../../data/HeaderDropdownItems/HeaderDropdownItems";
import HeaderSignInDropdownItems from "../HeaderSignInDropdownItems/HeaderSignInDropdownItems";
import LoginRegistrationModal from "../LoginRegistrationModal/LoginRegistrationModal";
import Utils from "@/Utils.jsx";

const HeaderSignInOrRegister = () => {
    const [showContent, setShowContent] = useState(false);
    const menuRef = useRef(null); // Ref for the menu container
    const [showModal, setShowModal] = useState(false);
    const [ loginStatus, setLoginStatus ] = useState(false)

    const handleCloseModal = () => setShowModal(false);
    const handleOpenModal = () => setShowModal(true);

    const { token, user } = Utils()

    const getNickNameFromGmail = (email) => {
        if (email.endsWith("@gmail.com")) {
            return email.split("@gmail.com")[0]
        }
        return email;
    }

    useEffect(() => {

        const isLoggedIn = !!token

        isLoggedIn ? setLoginStatus(true) : setLoginStatus(false)

        const handleClickOutside = (event) => {
            if (menuRef.current && !menuRef.current.contains(event.target)) {
                setShowContent(false);
            }
        };

        document.addEventListener("mousedown", handleClickOutside);
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, []);

    return (
        <div className="relative">
            <div onClick={() => setShowContent((prev) => !prev)} ref={menuRef}>
                <div className="group flex items-center gap-1.5 text-white cursor-pointer relative">
                    <div className="text-3xl">
                        <IoPersonOutline />
                    </div>

                    <div className="text-xs">
                        <p>Welcome</p>
                        {
                            loginStatus ? (
                                <p>Welcome {getNickNameFromGmail(user.email)}</p>
                            ) : (
                                <h3 className="flex items-start font-semibold">
                                    Sign in / Register
                                    <span className="text-xl">
                                <MdOutlineKeyboardArrowDown/>
                            </span>
                                </h3>
                            )
                        }

                    </div>
                </div>
            </div>

            {/* Animated dropdown menu */}
            <AnimatePresence>
                {showContent && (
                    <motion.div
                        initial={{ opacity: 0, y: 15 }}
                        animate={{ opacity: 1, y: 0 }}
                        exit={{
                            opacity: 0,
                            y: 15,
                        }}
                        style={{ translateX: "-50%" }}
                        transition={{ duration: 0.2, ease: "easeOut" }}
                        className="left-1/2 top-12 absolute"
                    >
                        {/* div for triangle */}
                        <div className="left-1/2 absolute top-0 w-3 h-3 rotate-45 -translate-x-1/2 -translate-y-1/2 bg-white" />

                        {/* menu div */}
                        <div className=" rounded-2xl w-64 px-3 py-5 bg-white border shadow">
                            <div className="px-5 text-center">
                                <button
                                    className="bg-customBlack w-full py-2 text-xl font-bold text-white rounded-full"
                                    onClick={handleOpenModal}
                                >
                                    Sign in
                                </button>

                                <button className="text-customGray mt-2 mb-4 text-sm">
                                    Registration
                                </button>
                            </div>

                            <div className=" py-2.5 border-t">
                                {itemsWithLogos.map((item, index) => (
                                    <HeaderSignInDropdownItems
                                        key={index}
                                        logo={item.logo}
                                        itemTitle={item.itemTitle}
                                    ></HeaderSignInDropdownItems>
                                ))}
                            </div>
                        </div>
                    </motion.div>
                )}
            </AnimatePresence>

            {/* shows modal when we click the trigger button */}

            {showModal && (
                <LoginRegistrationModal
                    handleCloseModal={handleCloseModal}
                ></LoginRegistrationModal>
            )}
        </div>
    );
};

export default HeaderSignInOrRegister;
