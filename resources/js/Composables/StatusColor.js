export default function getStatusColor(status) {
    switch (true) {
        case status >= 100 && status < 200:
            return 'text-blue-500';
        case status >= 200 && status < 300:
            return 'text-green-500';
        case status >= 300 && status < 400:
            return 'text-yellow-500';
        case status >= 400 && status < 500:
            return 'text-blue-500';
        case status >= 500:
            return 'text-red-500';
        default:
            return 'text-black-500';
    }
};
