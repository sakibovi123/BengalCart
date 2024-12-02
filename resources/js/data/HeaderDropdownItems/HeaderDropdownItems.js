import { HiOutlineClipboardDocumentList } from "react-icons/hi2";
import { RiCopperCoinLine } from "react-icons/ri";
import { RiMessage2Line } from "react-icons/ri";
import { GoCreditCard } from "react-icons/go";
import { IoIosHeartEmpty } from "react-icons/io";
import { RiCoupon3Line } from "react-icons/ri";

const itemsWithLogos = [
    { logo: HiOutlineClipboardDocumentList, itemTitle: "My orders" },
    { logo: RiCopperCoinLine, itemTitle: "My coins" },
    { logo: RiMessage2Line, itemTitle: "Message center" },
    { logo: GoCreditCard, itemTitle: "Payment" },
    { logo: IoIosHeartEmpty, itemTitle: "Wishlist" },
    { logo: RiCoupon3Line, itemTitle: "My coupons" },
];

const itemsWithoutLogos = [
    "Settings",
    "Bengal Cart Business",
    "DS Center",
    "Seller Log In",
    "Buyer Protection",
    "Help Center",
    "Disputes & Reports",
    "Accessibility",
    "Penalties Information",
];

export { itemsWithLogos, itemsWithoutLogos };
